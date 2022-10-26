<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Icon from '@/Components/Icon.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';
import TextInput from '@/Components/TextInput.vue';
import SearchFilter from '@/Components/SearchFilter.vue';
import pickBy from 'lodash/pickBy';
import throttle from 'lodash/throttle';
import mapValues from 'lodash/mapValues';
export default {
    components: {
        AuthenticatedLayout,
        Head,
        ApplicationLogo,
        Icon,
        Link,
        Pagination,
        TextInput,
        SearchFilter,
    },
    props: {
        types: Object,
        filters: Object,
    },
    data () {
        return {
            form: this.$inertia.form({
                id: null,
                name: null,
            }),
            isCreateOn: false,
            filter: {
                search: this.filters,
            },
        }
    },
    watch: {
        filter: {
            deep: true,
            handler: throttle(function () {
                this.$inertia.get('type', pickBy(this.filter), { preserveState: true })
            }, 150),
        },
    },
    remember: 'form',
    methods: {
        reset() {
            this.filter = mapValues(this.filter, () => null)
        },
        inlineEdit: function (id, name) {
            if(this.isCreateOn===true){
                this.isCreateOn = false
            }
            this.form.id = id
            this.form.name = name
        },
        saveEdit: function (idA) {
            const type = this.types.data.find(a => a.id === idA)
            if(this.form.name!==type.name){
                this.form.put(`/type/${idA}`)
            }
            this.form.id = null
            this.form.name = null
        },
        cancelCreate: function (isTrue) {
            this.form.id = null
            this.form.name = null
            this.isCreateOn = isTrue
        },
        storeMerk: function () {
            this.form.post('type')
            this.isCreateOn = false
        },
        deleteEdit: function (id,name) {
            if(confirm('Delete '+name)){
                this.form.delete(`type/${id}`)
            }
        },
    }
}
</script>
<template>
    <Head title="Referensi" />
    <AuthenticatedLayout>
            <div class="flex">
                <span class="text-3xl font-bold">Type</span>
                <span class="text-3xl font-bold">&nbsp;/&nbsp;</span>
                <!-- <Link>Referensi</Link> -->
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-2/3">
                    <div class="flex items-center justify-between my-5">
                        <search-filter v-model="filter.search" :show-dropdown="false" class="mr-4 w-full max-w-md" @reset="reset" />
                        <button v-if="isCreateOn===true||form.name!=null" @click="cancelCreate(false)" class="bg-yellow-500 hover:bg-yellow-600 py-2 px-4 text-md rounded font-bold text-white">Cancel</button>
                        <button v-else @click="cancelCreate(true)" class="bg-blue-500 hover:bg-blue-600 py-2 px-4 text-md rounded font-bold text-white">Create</button>

                    </div>
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="w-12 py-2">No</th>
                                <th colspan="2">Type</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            <tr v-if="isCreateOn===true">
                                <td class="border-t">
                                    <span class="flex px-6 py-3">X</span>
                                </td>
                                <td class="border-t">

                                    <text-input v-model="form.name" errors="form.errors.name" class="w-full"  placeholder="type name..." maxlength="15" />
                                </td>
                                <td>
                                    <div class="flex justify-end">
                                        <button @click="storeMerk()"><Icon name="saved" class="h-6 w-6 fill-green-500 hover:fill-green-600" /></button>
                                    </div>
                                </td>
                            </tr>
                            <tr v-for="type, no in types.data" :key="no++" class="hover:bg-gray-100">
                                <td class="border-t">
                                    <div class="flex px-6 py-3">
                                        {{ no }}
                                    </div>
                                </td>
                                <td class="border-t">
                                    <text-input v-if="form.id===type.id" v-model="form.name" errors="form.errors.name" class="w-full"  placeholder="type name..." maxlength="15" />
                                    <div v-else class="flex px-6 py-3">
                                        {{ type.name }}
                                    </div>
                                </td>
                                <td class="border-t">
                                    <div class="flex justify-end">
                                        <template v-if="form.id!==type.id">
                                        <button @click="inlineEdit(type.id,type.name)">
                                            <Icon name="cheveron-right" class="h-6 w-6 fill-gray-600" />
                                        </button>
                                        </template>
                                        <template v-else>
                                        <button @click="saveEdit(type.id)">
                                            <Icon name="edit-pen" class="h-6 w-6 fill-yellow-500 hover:fill-yellow-600" />
                                        </button>
                                        <button @click="deleteEdit(type.id,type.name)" class="ml-1">
                                            <Icon name="trash" class="h-6 w-6 fill-red-500 hover:fill-red-600" />
                                        </button>
                                        </template>

                                    </div>
                                </td>
                            </tr>
                            <tr v-if="types.data.length===0">
                                <td colspan="3" class="px-6 py-1 border-t">No Data Found</td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination class="mt-6" :links="types.links" />
                </div>
            </div>
    </AuthenticatedLayout>
</template>
