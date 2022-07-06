<template>

    <Head :title="title">
        <link rel="icon" type="image/x-icon" href="/vendor/telescope/favicon.ico" />
        <meta name="description" content="This is my register pages" />
    </Head>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow" />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Register to new journey</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or
                    {{ ' ' }}
                    <Link href="/auth" class="font-medium text-indigo-600 hover:text-indigo-500"> Login to your account
                    </Link>
                </p>
            </div>
            <form @submit.prevent="submit" class="mt-8 space-y-6">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" name="name" v-model="name" type="text" autocomplete="name" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Name" />
                    </div>
                    <div>
                        <label for="email" class="sr-only">Email address</label>
                        <input id="email" name="email" v-model="email" type="email" autocomplete="email" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Email address" />
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" v-model="password" type="password"
                            autocomplete="current-password" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Password" />
                    </div>
                    <div>
                        <label for="repassword" class="sr-only">Re Password</label>
                        <input id="repassword" name="repassword" v-model="repassword" type="password"
                            autocomplete="current-password" required=""
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Re Password" />
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                aria-hidden="true" />
                        </span>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { LockClosedIcon } from '@heroicons/vue/solid'

const name = ref('')
const email = ref('')
const password = ref('')
const repassword = ref('')
</script>

<script>
import { Inertia } from '@inertiajs/inertia'
import { Link, Head } from "@inertiajs/inertia-vue3";

export default {
    created: function () {
        // console.log(this.title)
    },
    components: {
        Link,
        Head,
    },
    props: [
        'title'
    ],
    data: () => ({
        name: '',
        email: '',
        password: '',
        repassword: ''
    }),
    methods: {
        submit: function (message, event) {
            const result = Inertia.post('/auth/register', {
                _token: this.$page.props.csrf_token,
                name: this.name,
                email: this.email,
                password: this.password,
                repassword: this.repassword,
            })
        }
    }
}
</script>
