<template>
    <div :class="$attrs.class" class="flex flex-col">
        <label v-if="label" class="form-label" :for="id">{{ label }}</label>
        <input :id="id" ref="input" v-bind="{ ...$attrs, class: null }" class="form-input border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :class="[{ error: error }, inputClass]" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        <div v-if="error" class="form-error text-sm text-red-500">{{ error }}</div>
    </div>
</template>
<script>
import { v4 as uuid } from 'uuid'

export default {
    inheritAttrs: false,
    props: {
        id: {
            type: String,
            default() {
                return `text-input-${uuid()}`
            },
        },
        type: {
            type: String,
            default: 'text',
        },
        error: String,
        label: String,
        modelValue: {
            type: [String, Number],
        },
        inputClass: String,
    },
    emits: ['update:modelValue'],
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
        setSelectionRange(start, end) {
            this.$refs.input.setSelectionRange(start, end)
        },
    },
}
</script>
