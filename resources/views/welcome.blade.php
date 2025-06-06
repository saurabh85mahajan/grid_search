<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Custom Software Tools | Streamline Your Workflows with Tailored Data Management Solutions</title>

        <meta name="description" content="Simplify your business operations with custom software tools from AIWebDesk. Build tailored workflows, custom forms, secure data management, and export capabilities — designed to meet your unique business needs.">
        <meta name="keywords" content="custom software tools, workflow automation, data management, business software, secure delete, custom forms, export data, automate workflows, AIWebDesk software, enterprise tools, tailored software solutions">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <link rel="icon" href="https://aiwebdesk.com/vendor/shop/themes/default/assets/favicon.ico">

        <!-- Embedded Tailwind CSS - No build process needed -->
        <style>
            /*! tailwindcss v3.4.0 | MIT License | https://tailwindcss.com */
            *,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}

            /* Custom Styles */
            body {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            }

            .bg-gray-50 { background-color: #f9fafb; }
            .bg-white { background-color: #ffffff; }
            .bg-gray-900 { background-color: #111827; }
            .bg-blue-600 { background-color: #2563eb; }
            .bg-indigo-600 { background-color: #4f46e5; }
            .bg-blue-700 { background-color: #1d4ed8; }
            .bg-indigo-700 { background-color: #4338ca; }
            .bg-blue-100 { background-color: #dbeafe; }
            .bg-indigo-100 { background-color: #e0e7ff; }
            .bg-green-100 { background-color: #dcfce7; }
            .bg-red-100 { background-color: #fee2e2; }
            .bg-purple-100 { background-color: #f3e8ff; }
            .bg-orange-100 { background-color: #fed7aa; }

            .text-gray-900 { color: #111827; }
            .text-gray-800 { color: #1f2937; }
            .text-gray-700 { color: #374151; }
            .text-gray-600 { color: #4b5563; }
            .text-gray-500 { color: #6b7280; }
            .text-gray-400 { color: #9ca3af; }
            .text-white { color: #ffffff; }
            .text-blue-600 { color: #2563eb; }
            .text-indigo-600 { color: #4f46e5; }
            .text-blue-700 { color: #1d4ed8; }
            .text-indigo-700 { color: #4338ca; }
            .text-green-600 { color: #16a34a; }
            .text-red-600 { color: #dc2626; }
            .text-purple-600 { color: #9333ea; }
            .text-orange-600 { color: #ea580c; }
            .text-blue-100 { color: #dbeafe; }
            .text-blue-200 { color: #bfdbfe; }

            .border-gray-200 { border-color: #e5e7eb; }
            .border-gray-300 { border-color: #d1d5db; }
            .border-gray-800 { border-color: #1f2937; }

            .min-h-screen { min-height: 100vh; }
            .max-w-4xl { max-width: 56rem; }
            .max-w-6xl { max-width: 72rem; }
            .max-w-2xl { max-width: 42rem; }
            .max-w-3xl { max-width: 48rem; }
            
            .mx-auto { margin-left: auto; margin-right: auto; }
            .mb-2 { margin-bottom: 0.5rem; }
            .mb-4 { margin-bottom: 1rem; }
            .mb-6 { margin-bottom: 1.5rem; }
            .mb-8 { margin-bottom: 2rem; }
            .mb-12 { margin-bottom: 3rem; }
            .mb-16 { margin-bottom: 4rem; }
            .mb-20 { margin-bottom: 5rem; }
            .ml-2 { margin-left: 0.5rem; }

            .p-4 { padding: 1rem; }
            .p-6 { padding: 1.5rem; }
            .p-8 { padding: 2rem; }
            .px-4 { padding-left: 1rem; padding-right: 1rem; }
            .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
            .px-8 { padding-left: 2rem; padding-right: 2rem; }
            .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
            .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
            .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
            .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
            .py-16 { padding-top: 4rem; padding-bottom: 4rem; }
            .py-20 { padding-top: 5rem; padding-bottom: 5rem; }
            .pt-8 { padding-top: 2rem; }

            .flex { display: flex; }
            .grid { display: grid; }
            .hidden { display: none; }
            .inline-flex { display: inline-flex; }
            .block { display: block; }

            .w-6 { width: 1.5rem; }
            .w-8 { width: 2rem; }
            .w-12 { width: 3rem; }
            .w-16 { width: 4rem; }
            .w-full { width: 100%; }
            .h-6 { height: 1.5rem; }
            .h-8 { height: 2rem; }
            .h-12 { height: 3rem; }
            .h-16 { height: 4rem; }

            .flex-col { flex-direction: column; }
            .items-center { align-items: center; }
            .justify-center { justify-content: center; }
            .justify-between { justify-content: space-between; }
            .text-center { text-align: center; }

            .gap-4 { gap: 1rem; }
            .gap-6 { gap: 1.5rem; }
            .gap-8 { gap: 2rem; }

            .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
            
            .rounded-lg { border-radius: 0.5rem; }
            .rounded-xl { border-radius: 0.75rem; }
            .rounded-2xl { border-radius: 1rem; }
            .rounded-full { border-radius: 9999px; }

            .shadow-sm { box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05); }
            .shadow-lg { box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); }
            .shadow-xl { box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); }

            .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
            .text-base { font-size: 1rem; line-height: 1.5rem; }
            .text-lg { font-size: 1.125rem; line-height: 1.75rem; }
            .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
            .text-2xl { font-size: 1.5rem; line-height: 2rem; }
            .text-3xl { font-size: 1.875rem; line-height: 2.25rem; }
            .text-4xl { font-size: 2.25rem; line-height: 2.5rem; }
            .text-5xl { font-size: 3rem; line-height: 1; }
            .text-6xl { font-size: 3.75rem; line-height: 1; }

            .font-medium { font-weight: 500; }
            .font-semibold { font-weight: 600; }
            .font-bold { font-weight: 700; }
            .font-extrabold { font-weight: 800; }

            .leading-tight { line-height: 1.25; }
            .tracking-tight { letter-spacing: -0.025em; }

            .underline { text-decoration-line: underline; }

            .border { border-width: 1px; }
            .border-t { border-top-width: 1px; }

            .transition-colors { transition-property: color, background-color, border-color, text-decoration-color, fill, stroke; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
            .transition-all { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
            .duration-200 { transition-duration: 200ms; }
            .duration-300 { transition-duration: 300ms; }

            .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)); }
            .from-blue-600 { --tw-gradient-from: #2563eb; --tw-gradient-to: rgb(37 99 235 / 0); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
            .to-indigo-600 { --tw-gradient-to: #4f46e5; }

            .text-transparent { color: transparent; }
            .bg-clip-text { -webkit-background-clip: text; background-clip: text; }

            /* Hover states */
            .hover\:text-indigo-600:hover { color: #4f46e5; }
            .hover\:text-indigo-700:hover { color: #4338ca; }
            .hover\:text-blue-700:hover { color: #1d4ed8; }
            .hover\:text-white:hover { color: #ffffff; }
            .hover\:text-blue-200:hover { color: #bfdbfe; }
            .hover\:bg-indigo-700:hover { background-color: #4338ca; }
            .hover\:bg-blue-700:hover { background-color: #1d4ed8; }
            .hover\:shadow-lg:hover { box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); }
            .hover\:shadow-xl:hover { box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1); }
            .hover\:-translate-y-1:hover { transform: translateY(-0.25rem); }

            /* Focus states */
            .focus\:outline-none:focus { outline: 2px solid transparent; outline-offset: 2px; }
            .focus\:ring-2:focus { --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color); --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color); box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000); }
            .focus\:ring-indigo-500:focus { --tw-ring-color: #6366f1; }
            .focus\:ring-white:focus { --tw-ring-color: #ffffff; }
            .focus\:ring-offset-2:focus { --tw-ring-offset-width: 2px; }
            .focus\:ring-offset-indigo-600:focus { --tw-ring-offset-color: #4f46e5; }

            /* Responsive */
            @media (min-width: 768px) {
                .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
                .md\:text-6xl { font-size: 3.75rem; line-height: 1; }
                .md\:text-xl { font-size: 1.25rem; line-height: 1.75rem; }
                .md\:flex-row { flex-direction: row; }
            }

            @media (min-width: 1024px) {
                .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .lg\:px-8 { padding-left: 2rem; padding-right: 2rem; }
            }

            /* Animation */
            .animate-fade-in {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }

            .animate-fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }
        </style>
    </head>
    <body class="bg-gray-50 min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <div class="max-w-6xl mx-auto px-4 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-900">Custom Software Tools</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="py-20 px-4 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-8 tracking-tight leading-tight">
                    Streamline Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Workflows</span> Online
                </h1>
                <p class="text-xl md:text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
                    Transform your business processes with custom forms and data management tools. We create tailored solutions that help you organize, manage, and control your data efficiently.
                </p>
                <div class="flex flex-col items-center gap-6">
                    <a href="https://aiwebdesk.com/contact-us" 
                       class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Get Started Today
                        <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <p class="text-sm text-gray-500">
                        Contact us at <a href="https://aiwebdesk.com/contact-us" class="text-indigo-600 hover:text-indigo-700 font-medium">aiwebdesk.com/contact-us</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 px-4 lg:px-8 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Complete Data Management Solutions
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        We provide end-to-end custom software tools that adapt to your unique business needs and workflow requirements.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Custom Forms -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Custom Forms</h3>
                        <p class="text-gray-600">
                            Tailored forms designed specifically for your data collection needs. From simple contact forms to complex multi-step workflows.
                        </p>
                    </div>

                    <!-- Data Management -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Data Management</h3>
                        <p class="text-gray-600">
                            Organize and manage your data efficiently with intuitive interfaces and powerful search capabilities.
                        </p>
                    </div>

                    <!-- View & Edit -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">View & Edit</h3>
                        <p class="text-gray-600">
                            Easy-to-use interfaces for viewing and editing your data with role-based access controls and validation.
                        </p>
                    </div>

                    <!-- Delete Control -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Secure Delete</h3>
                        <p class="text-gray-600">
                            Controlled data deletion with proper permissions and audit trails to maintain data integrity.
                        </p>
                    </div>

                    <!-- Download & Export -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Download & Export</h3>
                        <p class="text-gray-600">
                            Export your data in multiple formats including CSV, Excel, PDF, and more for reporting and analysis.
                        </p>
                    </div>

                    <!-- Workflow Integration -->
                    <div class="feature-card p-8 bg-gray-50 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Workflow Integration</h3>
                        <p class="text-gray-600">
                            Seamlessly integrate with your existing workflows and automate repetitive tasks to boost productivity.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="py-16 px-4 lg:px-8 bg-gray-50">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">
                    Why Choose Our Custom Solutions?
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="benefit-card text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tailored to Your Needs</h3>
                        <p class="text-gray-600">Every solution is custom-built to match your specific business requirements and workflows.</p>
                    </div>
                    <div class="benefit-card text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Boost Productivity</h3>
                        <p class="text-gray-600">Streamline your processes and eliminate manual tasks with automated workflows.</p>
                    </div>
                    <div class="benefit-card text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Secure & Reliable</h3>
                        <p class="text-gray-600">Enterprise-grade security with regular backups and robust data protection.</p>
                    </div>
                    <div class="benefit-card text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Ongoing Support</h3>
                        <p class="text-gray-600">Dedicated support and maintenance to ensure your tools continue to serve your needs.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 lg:px-8 bg-gradient-to-r from-blue-600 to-indigo-600">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-6">
                    Ready to Transform Your Workflows?
                </h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Let's discuss how we can create custom software tools that perfectly fit your business needs and help you manage your data more efficiently.
                </p>
                <div class="flex flex-col items-center gap-6">
                    <a href="https://aiwebdesk.com/contact-us" 
                       class="inline-flex items-center px-8 py-4 text-lg font-semibold text-indigo-600 bg-white rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                        Contact Us Today
                        <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </a>
                    <p class="text-blue-100">
                        Visit us at <a href="https://aiwebdesk.com/contact-us" class="text-white hover:text-blue-200 font-medium underline">aiwebdesk.com/contact-us</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 py-12 px-4 lg:px-8">
            <div class="max-w-6xl mx-auto text-center">
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-white mb-2">Custom Software Tools</h3>
                    <p class="text-gray-400">Streamlining workflows with tailored solutions</p>
                </div>
                
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-gray-400 text-sm">
                            © {{ date('Y') }} Custom Software Tools. All rights reserved.
                        </p>
                        <div class="flex items-center gap-6">
                            <a href="https://aiwebdesk.com/contact-us" class="text-gray-400 hover:text-white text-sm transition-colors duration-200">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            // Add smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Add fade-in animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe elements for animation
            document.querySelectorAll('.feature-card, .benefit-card').forEach(el => {
                el.classList.add('animate-fade-in');
                observer.observe(el);
            });

            // Add staggered animation delay
            document.querySelectorAll('.feature-card').forEach((card, index) => {
                card.style.transitionDelay = `${index * 100}ms`;
            });

            document.querySelectorAll('.benefit-card').forEach((card, index) => {
                card.style.transitionDelay = `${index * 150}ms`;
            });
        </script>
    </body>
</html>