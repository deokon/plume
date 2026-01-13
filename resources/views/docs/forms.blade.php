<x-app-layout title="Forms - Components">
    <div class="space-y-12">
        <div class="border-b border-background-700/40 pb-8 dark:border-background-400/20">
            <h1 class="text-3xl font-bold tracking-tight">Forms</h1>
            <p class="mt-2 text-lg text-foreground/50 dark:text-background-400">A collection of form components for user input.</p>
        </div>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold tracking-tight">Examples</h2>

            <x-plume::form action="#" formData="docForm" class="max-w-4xl">
                <x-plume::form.section title="User Information" description="Please fill out the form below." minCols="1" maxCols="2">
                    <x-plume::form.input label="First Name" model="first_name" placeholder="John" />
                    <x-plume::form.input label="Last Name" model="last_name" placeholder="Doe" />
                    <x-plume::form.input label="Username" model="username" placeholder="johndoe" />
                    <x-plume::form.input label="Phone Number" model="phone" placeholder="+1 (555) 123-4567" />
                </x-plume::form.section>

                <x-plume::form.section>
                    <x-plume::form.input label="Email Address" model="email" type="email" placeholder="you@example.com" icon="icon-[fluent--mail-24-regular]">
                        <x-slot:after><p class="text-sm text-foreground/50 dark:text-background-400">We'll never share your email.</p></x-slot:after>
                    </x-plume::form.input>
                    <x-plume::form.password label="Password" model="password" />
                    <x-plume::form.select label="Favorite Fruit" model="fruit">
                        <option value="apple">Apple</option>
                        <option value="banana">Banana</option>
                        <option value="orange">Orange</option>
                    </x-plume::form.select>
                    <x-plume::form.textarea label="Message" model="message" placeholder="Your message..." />
                </x-plume::form.section>

                <x-plume::form.section minCols="1" maxCols="2">
                    <x-plume::form.group label="Notifications" description="These are the types of notifications you can receive." name="notifications" model="notifications">
                        <x-plume::form.checkbox value="comments">Comments</x-plume::form.checkbox>
                        <x-plume::form.checkbox value="candidates">Candidates</x-plume::form.checkbox>
                        <x-plume::form.checkbox value="offers">Offers</x-plume::form.checkbox>
                    </x-plume::form.group>
                    <x-plume::form.group label="Standalone Checkboxes">
                        <x-plume::form.checkbox name="accept_terms" model="accept_terms">
                            I accept the <a href="#" class="text-primary underline">terms and conditions</a>.
                        </x-plume::form.checkbox>
                        <x-plume::form.checkbox name="remember_me" model="remember_me">Remember Me</x-plume::form.checkbox>
                        <h3 class="font-medium mt-6 mb-2">Toggle Switch</h3>
                        <x-plume::form.toggle name="dark_mode_pref" model="dark_mode_pref">Enable Dark Mode</x-plume::form.toggle>
                    </x-plume::form.group>
                    <x-plume::form.group label="Push Notifications" name="push" model="push" minCols="3" class="col-span-full">
                        <x-plume::form.radio value="everything">Everything</x-plume::form.radio>
                        <x-plume::form.radio value="same_as_email">Same as Email</x-plume::form.radio>
                        <x-plume::form.radio value="nothing">No Push Notifications</x-plume::form.radio>
                        <x-plume::form.radio value="custom">Custom</x-plume::form.radio>
                        <x-plume::form.radio value="weekly_summary">Weekly Summary</x-plume::form.radio>
                        <x-plume::form.radio value="monthly_report">Monthly Report</x-plume::form.radio>
                    </x-plume::form.group>
                    <x-plume::form.group label="Color Picker">
                        <x-plume::form.color name="theme_color" model="theme_color">Theme Color</x-plume::form.color>
                    </x-plume::form.group>
                    <x-plume::form.group label="Number Input">
                        <x-plume::form.number  name="quantity" model="quantity" min="1" max="10">Quantity</x-plume::form.number>
                    </x-plume::form.group>
                </x-plume::form.section>

                <x-plume::form.section title="Date & Time Inputs" minCols="1" maxCols="3">
                    <x-plume::form.date name="start_date" model="start_date">Start Date</x-plume::form.date>
                    <x-plume::form.datetime name="appointment" model="appointment">Appointment</x-plume::form.datetime>
                    <x-plume::form.time name="start_time" model="start_time">Start Time</x-plume::form.time>
                </x-plume::form.section>

                <x-plume::form.section>
                    <x-plume::form.file name="photo" model="photo">Profile Photo</x-plume::form.file>
                    <h3 class="font-medium mt-6 mb-2">Range Slider</h3>
                    <x-plume::form.range name="volume" model="volume" min="0" max="100" step="1">Volume</x-plume::form.range>
                </x-plume::form.section>

                <x-plume::form.actions>
                    <x-plume::button type="reset" style="outline">Reset</x-plume::button>
                    <x-plume::spacer />
                    <x-plume::button type="submit">Submit</x-plume::button>
                </x-plume::form.actions>
            </x-plume::form>

            <h3 class="text-lg font-medium mt-12 mb-4">Inline Form</h3>
            <x-plume::form.inline action="#" formData="inlineDocForm">
                <x-plume::form.input label="Email" model="inline_email" placeholder="Email" class="sm:w-64" />
                <x-plume::form.password label="Password" model="inline_password" placeholder="Password" class="sm:w-64" />
                <x-plume::button class="mb-1">Subscribe</x-plume::button>
            </x-plume::form.inline>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Properties</h2>
            
            <div class="space-y-8">
                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Form</h3>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head>Prop</x-plume::table.head>
                                <x-plume::table.head>Type</x-plume::table.head>
                                <x-plume::table.head>Default</x-plume::table.head>
                                <x-plume::table.head>Description</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">action</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">''</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Form submission URL.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">method</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">POST</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">HTTP method.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">formData</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">AlpineJS function name for form state.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>

                <div class="space-y-4">
                    <h3 class="text-lg font-medium">Shared Input Props</h3>
                    <p class="text-sm text-foreground/50 dark:text-background-400">Most input components (Input, Select, Textarea, etc.) share these properties.</p>
                    <x-plume::table>
                        <x-plume::table.header>
                            <x-plume::table.row>
                                <x-plume::table.head>Prop</x-plume::table.head>
                                <x-plume::table.head>Type</x-plume::table.head>
                                <x-plume::table.head>Default</x-plume::table.head>
                                <x-plume::table.head>Description</x-plume::table.head>
                            </x-plume::table.row>
                        </x-plume::table.header>
                        <x-plume::table.body>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary underline decoration-dotted decoration-primary/50">label</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs font-bold text-destructive">Required (or slot). The field label.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">model</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">AlpineJS model name for two-way binding.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">placeholder</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">''</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Input placeholder text.</x-plume::table.cell>
                            </x-plume::table.row>
                            <x-plume::table.row>
                                <x-plume::table.cell class="font-mono text-xs text-primary">icon</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs italic">string</x-plume::table.cell>
                                <x-plume::table.cell class="font-mono text-xs">null</x-plume::table.cell>
                                <x-plume::table.cell class="text-xs">Icon class name.</x-plume::table.cell>
                            </x-plume::table.row>
                        </x-plume::table.body>
                    </x-plume::table>
                </div>
            </div>
        </section>

        <section class="space-y-6 pt-12 border-t border-background-700/40 dark:border-background-400/20">
            <h2 class="text-2xl font-bold tracking-tight">Usage</h2>
            <div class="space-y-4">
                <h3 class="text-lg font-medium">Input with Icon and Help Text</h3>
                <x-plume::code language="blade">
&lt;x-plume::form.input 
    label="Email" 
    model="email" 
    type="email" 
    icon="icon-[fluent--mail-24-regular]"
&gt;
    &lt;x-slot:after&gt;
        &lt;p class="text-xs text-foreground/50"&gt;We'll never share your email.&lt;/p&gt;
    &lt;/x-slot:after&gt;
&lt;/x-plume::form.input&gt;</x-plume::code>

                <h3 class="text-lg font-medium mt-8">Form Section</h3>
                <x-plume::code language="blade">
&lt;x-plume::form.section title="Profile" description="Update your info."&gt;
    &lt;x-plume::form.input label="Name" model="name" /&gt;
&lt;/x-plume::form.section&gt;</x-plume::code>
            </div>
        </section>

        <script>
            function docForm() {
                return {
                    first_name: '',
                    last_name: '',
                    username: '',
                    phone: '',
                    email: '',
                    password: '',
                    message: '',
                    fruit: '',
                    notifications: [],
                    push: 'everything',
                    accept_terms: false,
                    remember_me: false,
                    dark_mode_pref: false,
                    photo: null,
                    volume: 50,
                    start_date: null,
                    appointment: null,
                    start_time: null,
                    theme_color: '#000000',
                    quantity: 1,
                    hasError(field) { return this.errors && this.errors[field]; },
                    errors: {
                        email: 'Invalid email address.'
                    }
                };
            }
            function inlineDocForm() {
                return {
                    inline_email: '',
                    inline_password: '',
                    hasError(field) { return this.errors && this.errors[field]; },
                    errors: {
                        inline_email: 'Invalid email address.'
                    }
                };
            }
        </script>
    </div>
</x-app-layout>
