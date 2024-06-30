<template>
    <Form @submit.prevent="saveCost">
        <template #form>
            <div class="flex flex-col mb-2 gap-10 pt-3">
                <div v-for="user in users" :key="user.id" class="w-1/2">
                    <label :for="'position-' + user.id">{{ user.name }}</label>
                    <Input 
                        :id="'position-' + user.id" 
                        type="number" 
                        class="mt-1 block w-full" 
                        v-model="form.positions[user.id]" 
                        :label="'Position for ' + user.name"
                    />
                    <InputError :message="form.errors['positions.' + user.id]" class="mt-2" />
                </div>
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
        users: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            form: useForm({
                positions: {}
            })
        }
    },
    methods: {
        saveCost() {
            // Prepara l'array per il backend
            const userPositions = {};
            for (const [userId, position] of Object.entries(this.form.positions)) {
                userPositions[userId] = Number(position);
            }

            this.form.post("/addranking", {
                preserveScroll: true,
                onSuccess: () => this.form.reset('positions'), 
            });
        }
    }
})
</script>