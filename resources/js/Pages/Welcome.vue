<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
// import { Reactive } from 'vue';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
// const person =  reactive({
//     name: 'bagus',
//     umur: 19,
// })
</script>

<template>
    <Head title="Test" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- <input type="text" name="a" v-bind="person.name" id="" class="border text-white bg-red-500"> -->
            <span class="text-white">
                <!-- Name {{ person.name+", umur "+person.umur }} -->
            </span>
            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
            </div>
        </div>
    </div>
</template>
