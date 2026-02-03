/**
 * Triggers a Plume event and its corresponding callback.
 * 
 * @param {Object} component - The Alpine component instance.
 * @param {string} name - The event/callback name (e.g., 'onPlay' or 'play').
 * @param {Object} detail - Data to pass to the event and callback.
 */
export function trigger(component, name, detail = {}) {
    // 1. Dispatch browser event: plume-on-play -> plume-play
    const eventName = 'plume-' + name
        .replace(/^on/, '')
        .replace(/[A-Z]/g, letter => `-${letter.toLowerCase()}`)
        .replace(/^-/, '');
    
    if (typeof component.$dispatch === 'function') {
        component.$dispatch(eventName, detail);
    }

    // 2. Execute callback from config
    const callbackKey = name.startsWith('on') 
        ? name 
        : `on${name.charAt(0).toUpperCase()}${name.slice(1)}`;
    
    const callback = component._config?.[callbackKey];

    if (callback) {
        if (typeof callback === 'function') {
            callback.call(component, detail);
        } else if (typeof callback === 'string' && window.Alpine && typeof window.Alpine.evaluate === 'function') {
            window.Alpine.evaluate(component.$el || document.body, callback, {
                scope: { ...detail, $event: { detail } }
            });
        }
    }
}
