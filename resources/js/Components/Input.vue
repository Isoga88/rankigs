<template>
    <label :for="label" class="relative block rounded-lg border border-gray-200 shadow-sm">
        <input :type="type" :id="id" class="peer flex h-8 text-sm w-full border-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-900 focus:ring-opacity-25 focus:bg-white rounded-lg text-black px-3 pb-px pt-1 placeholder-transparent  break-all " :value="modelValue" :disabled="disabled" @input="$emit('update:modelValue', $event.target.value)" ref="input" :placeholder="label"/>
        <span  @click="focus" class="cursor-text absolute start-2.5 -top-0.5 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-gray-500 peer-focus:-top-1  peer-placeholder-shown:text-sm peer-focus:text-xs line-clamp-1 text-ellipsis overflow-hidden  break-all">
            {{label}}<span v-if="required" class="">*</span>
        </span>
    </label>
</template>

<script>
export default {
    props: ['modelValue', 'disabled','type','id', 'label','required'],
    emits: ['update:modelValue'],
    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>
    