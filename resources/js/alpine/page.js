export default function (Alpine) {
    Alpine.data('page', () => ({
        mobileMenu: false,
        darkMode: document.documentElement.classList.contains('dark'),

        init() {
            this.darkMode =
                localStorage.theme === 'dark' ||
                (!('theme' in localStorage) &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.documentElement.classList.toggle('dark', this.darkMode);
        },

        toggleColorMode() {
            this.darkMode = !this.darkMode;
            this.setColorMode(this.darkMode ? 'dark' : 'light');
        },

        setColorMode(mode) {
            if (mode === 'light') {
                document.documentElement.classList.remove('dark');
            } else if (mode === 'dark') {
                document.documentElement.classList.add('dark');
            }

            if (mode === 'light' || mode === 'dark') {
                localStorage.theme = mode;
            } else {
                localStorage.removeItem('theme');
            }
        },
    }));
}
