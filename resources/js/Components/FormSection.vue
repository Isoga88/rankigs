<template>
    <div>
        <div class="md:col-span-2 max-w-7xl mx-auto">
            <form @submit.prevent="$emit('submitted')" class="">
              <fieldset :disabled="disabled">
<!--                  <slot name="customer"></slot>-->
                    <div>
                        <div class="flex flex-col gap-6 w-full">
                            <slot name="form"></slot>
                        </div>
                    </div>
                    <div class="gap-2 flex items-center justify-end pb-3 text-right " v-if="hasActions && !disabled">
                        <slot name="actions"></slot>
                    </div>
              </fieldset>
            </form>
        </div>
    </div>
</template>

<script>

export default {
    emits: ['submitted'],
    props: {
        disabled: Boolean
    },
    computed: {
        hasActions() {
            return !! this.$slots.actions
        }
    }
}
</script>