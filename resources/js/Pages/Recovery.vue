<template>

    <Head :title="title">
        <link rel="icon" type="image/x-icon" href="/vendor/telescope/favicon.ico" />
        <meta name="description" content="This is my register pages" />
    </Head>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>If your mail is match, yo'will get our reset password link.</p>
            </div>
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow" />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Recovery your account</h2>
            </div>
            <form @submit.prevent="submit" class="mt-8 space-y-6" action="#" method="POST">
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" type="email" v-model="email" autocomplete="email" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address" />
                    </div>

                </div>

                <div class="flex items-center justify-between">
                    <div class="text-sm">
                        <Link href="/auth" class="font-medium text-indigo-600 hover:text-indigo-500"> Have an account
                        </Link>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                aria-hidden="true" />
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { LockClosedIcon } from '@heroicons/vue/solid'

const email = ref('')
</script>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Link, Head } from "@inertiajs/inertia-vue3";

export default {
    created: function () {
        // console.log(this.message)
    },
    components: {
        Link,
        Head
    },
    props: [
        'title'
    ],
    data: () => ({
        email: ''
    }),
    methods: {
        submit: function (message, event) {
            const result = Inertia.post('/auth/recovery', {
                _token: this.$page.props.csrf_token,
                email: this.email
            })
            this.email = '';
        }
    }
}
</script>
