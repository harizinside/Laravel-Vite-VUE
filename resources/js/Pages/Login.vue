<template>

    <Head :title="title">
        <link rel="icon" type="image/x-icon" href="/vendor/telescope/favicon.ico" />
        <meta name="description" content="This is my register pages" />
    </Head>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div v-if="$page.props.flash.message"
                class="p-2 bg-red-600 items-center text-indigo-100 leading-none lg:rounded-full lg:inline-flex"
                role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ $page.props.flash.message }}</span>
            </div>
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow" />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    {{ ' ' }}
                    <Link href="/auth/register" class="font-medium text-indigo-600 hover:text-indigo-500"> Register your
                    account </Link>
                </p>
            </div>
            <form @submit.prevent="submit" class="mt-8 space-y-6" action="#" method="POST">
                <input type="hidden" name="remember" value="true" />
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" v-model="email" type="email" autocomplete="email" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address" />
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" v-model="password" type="password"
                            autocomplete="current-password" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                    </div>

                    <div class="text-sm">
                        <Link href="/auth/recovery" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot
                        your password? </Link>
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
const password = ref('')
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
        'title',
    ],
    data: () => ({
        email: '',
        password: ''
    }),
    methods: {
        submit: function (message, event) {
            const result = Inertia.post('/auth/login', {
                _token: this.$page.props.csrf_token,
                email: this.email,
                password: this.password
            })
            this.email = '';
            this.password = '';
        }
    }
}
</script>
