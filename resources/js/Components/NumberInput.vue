<template>
  <div>
    <div :class="$attrs.class">
      <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
      <VueNumberFormat :id="id" ref="input" :value="modelValue" class="form-input text-right" v-bind="{ ...$attrs, class: null }" :options="{ precision: 2, prefix: '', suffix: '', decimal: ',', thousand: '.', acceptNegative: false, isInteger: false }" @update:value="emitValue" />
      <div v-if="error" class="form-error">{{ error }}</div>
    </div>
  </div>
</template>

<script>
import VueNumberFormat from 'vue-number-format'
import { v4 as uuid } from 'uuid'

export default {
  components: {
    VueNumberFormat,
  },
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`
      },
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Number,
      default: 0,
    },
    error: String,
    label: String,
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
    emitValue(val) {
      this.$emit('update:modelValue', val)
    },
  },
}
</script>
