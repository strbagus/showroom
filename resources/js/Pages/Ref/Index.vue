<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Icon from '@/Components/Icon.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AuthenticatedLayout,
        Head,
        ApplicationLogo,
        Icon,
        Link,
    },
    props: {
        merks: Object,
        types: Object,
    },
    data () {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
            }),
            createMerkOn: false,
        }
    },
    remember: 'form',
    methods: {
        inlineEdit: function (id, name) {
            this.form.id = id
            this.form.name = name
        },
        saveEdit: function (idA) {
            const merk = this.merks.data.find(a => a.id === idA)
            if(this.form.name!==merk.name){
                this.form.put(`/refmerk/${idA}`)
            }
            this.form.id = null
            this.form.name = null
        },
        cancelEdit: function () {
            this.form.id = null
            this.form.name = null
        },
        createMerk: function () {
            // this.form.id = null
            // this.form.name = null
            this.createMerkOn = true
            console.log(this.createMerkOn)
        },
        // createMerk: function () {
        //     this.createMerkOn = true
        // }

    }
}
</script>
<template>
    <Head title="Referensi" />
    <AuthenticatedLayout>
        <div class="container mx-auto bg-white shadow rounded-xl py-6 px-8 mt-6">
            <div class="flex">
                <span class="text-2xl font-semibold">Referensi</span>
                <span class="text-2xl font-semibold">&nbsp;/&nbsp;</span>
                <!-- <Link>Referensi</Link> -->
            </div>
            <div class="flex flex-wrap">
                <div class="my-6 w-full lg:w-1/2 px-5">
                    <div class="flex items-center justify-between mb-3">
                        <h1 class="text-xl font-bold">Merk</h1>
                        <Link :href="route('refmerk.create')" class="bg-blue-500 hover:bg-blue-600 py-1 px-3 text-sm rounded font-bold text-white">Create</Link>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="w-12">No</th>
                                <th>Merk</th>
                                <th colspan="2">Model</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            <tr v-for="merk, no in merks.data" :key="no++" class="hover:bg-gray-100">
                                <td class="border-t">
                                    <Link :href="route('refmerk.edit', merk.id)" class="flex px-6 py-2">
                                        {{ no }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link :href="route('refmerk.edit', merk.id)" class="flex px-6 py-2">
                                        {{ merk.name }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link :href="route('refmerk.edit', merk.id)" class="flex px-6 py-2">
                                        <template v-for="model in merk.model">{{ model.name+', ' }}</template>
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link :href="route('refmerk.edit', merk.id)" class="flex justify-end">
                                        <Icon name="cheveron-right" class="h-6 w-6 fill-gray-600" />
                                    </Link>
                                </td>
                            </tr>
                            <tr v-if="merks.data.length===0">
                                <td colspan="4" class="px-6 py-1 border-t">No Data Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-6 w-full lg:w-1/2 px-5">
                    <div class="flex items-center justify-between mb-3">
                        <h1 class="text-xl font-bold">Type</h1>
                        <Link :href="route('reftype.create')" class="bg-blue-500 hover:bg-blue-600 py-1 px-3 text-sm rounded font-bold text-white">Create</Link>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="w-12">No</th>
                                <th colspan="2">Type</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            <tr v-for="type, no in types" :key="no++" class="hover:bg-gray-100">
                                <td class="border-t">
                                    <Link :href="route('reftype.edit', type.id)" class="flex px-6 py-2">
                                        {{ no }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link :href="route('reftype.edit', type.id)" class="flex px-6 py-2">
                                        {{ type.name }}
                                    </Link>
                                </td>
                                <td class="border-t">
                                    <Link :href="route('reftype.edit', type.id)" class="flex justify-end">
                                        <Icon name="cheveron-right" class="h-6 w-6 fill-gray-600" />
                                    </Link>
                                </td>
                            </tr>
                            <tr v-if="merks.data.length===0">
                                <td colspan="3" class="px-6 py-1 border-t">No Data Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>