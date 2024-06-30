<template>
    <Form @submit.prevent="saveCost">
        <template #form>
            <div class="flex flex-col mb-2 gap-10 pt-3">
                <div class="w-1/2">
                    <Input id="Name" type="text" class="mt-1 block w-full" v-model="form.name" ref="name" label="Nome"/>
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>
            </div>
            <div class="w-1/2">
                <Input id="email" type="text" class="mt-1 block w-full" v-model="form.email" ref="email" label="email"/>
                <InputError :message="form.errors.email" class="mt-2" />
            </div>
        </template>
        <template #actions>
            <button>
                <span>Salva</span>
            </button>
        </template>
    </Form>
</template>

<script>
import { useForm, router } from '@inertiajs/vue3'
import { defineComponent } from 'vue'
import Input from '../Components/Input.vue'
import Form from "../Components/FormSection.vue"
import InputError from "../Components/InputError.vue"

export default defineComponent({
    components: {
        Input,
        Form,
        InputError
    },
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            form: useForm({
                user_id: null,
                name: "",
                email:  "",
            })
        }
    },
    methods: {
        saveCost() {
            this.form.post("/adduser",{
                preserveScroll: true,
                onSuccess: () => this.form.reset('password'), 
            });
        }
    }
})
</script>