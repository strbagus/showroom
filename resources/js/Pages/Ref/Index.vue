<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        models: Object,
    },
}
</script>
<template>
    <Head title="Referensi" />
    <AuthenticatedLayout>
        <div class="container mx-auto bg-white shadow rounded-xl">
            <div class="border p-2" v-for="model in models.data">
                {{ model.id+model.name+model.merk }}
            </div>
        </div>
    </AuthenticatedLayout>
</template>