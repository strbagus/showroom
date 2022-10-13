<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <Head title="Item" />
    <AuthenticatedLayout>
        Hallo Item
    </AuthenticatedLayout>
</template>