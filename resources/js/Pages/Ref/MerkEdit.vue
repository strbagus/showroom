<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import TextInput from '@/Components/TextInput.vue';
import Icon from '@/Components/Icon.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        AuthenticatedLayout,
        Head,
        ApplicationLogo,
        Icon,
        Link,
        TextInput,
    },
    props: {
        merk: Object,
        models: Object,
    },
    data () {
        return {
            form: this.$inertia.form({
                id: this.merk.id,
                name: this.merk.name,
            }),
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
                <Link :href="route('ref')" class="text-2xl font-semibold text-indigo-500 hover:text-indigo-600">Referensi</Link>
                <span class="text-2xl font-semibold">&nbsp;/&nbsp;</span>
                <span class="text-2xl font-semibold">Merk - {{ merk.name }}</span>
            </div>
            <div class="flex flex-wrap">
                <div class="my-6 w-full lg:w-1/2 px-5">
                    <div class="flex flex-wrap">
                        <text-input v-model="form.name" class="px-3 py-1 bg-gray-100 w-1/3" label="Name" />
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="w-12">No</th>
                                <th>Model</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            <tr v-for="model, no in models" :key="no++">
                                <td class="border-t">
                                    {{ no }}
                                </td>
                                <td class="border-t">
                                    {{ model.name }}
                                </td>
                            </tr>   
                            <!-- <tr v-for="merk, no in merks.data" :key="no++" class="hover:bg-gray-100">
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
                                    <Link :href="route('refmerk.edit', merk.id)" class="flex justify-end">
                                        <Icon name="cheveron-right" class="h-6 w-6 fill-gray-600" />
                                    </Link>
                                </td>
                            </tr> -->
                            <tr v-if="models.length===0">
                                <td colspan="4" class="px-6 py-1 border-t">No Data Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>