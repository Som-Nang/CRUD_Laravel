<template>
    <div class="flex justify-center p-8">
        <form
            @submit.prevent="submit"
            class="flex flex-col items-center bg-gray-100 p-8 rounded-xl"
        >
            <h1 class="text-green-500 font-bold text-xl pb-4">
                Save Your Activity
            </h1>
            <div class="div">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-gray-900">Name</span>
                    </div>
                    <input
                        type="name"
                        placeholder="Name"
                        id="name"
                        v-model="form.name"
                        class="input input-bordered input-primary w-96 max-w-xs"
                    />
                </label>
                <div class="label" v-if="errors.name">
                    <span class="label-text-alt text-red-500">{{ errors.name }}</span>
                </div>
            </div>

            <div class="">
                <label class="form-control w-full max-w-xs pt-2">
                    <div class="label">
                        <span class="label-text text-gray-900">Email</span>
                    </div>
                    <input
                        type="email"
                        placeholder="Email"
                        id="email"
                        v-model="form.email"
                        class="input input-bordered input-primary w-96 max-w-xs"
                    />
                </label>
                <div class="label" v-if="errors.email">
                    <span class="label-text-alt text-red-500">{{ errors.email }}</span>
                </div>
            </div>

            <div class="">
                <label class="form-control w-full max-w-xs pt-2">
                    <div class="label">
                        <span class="label-text text-gray-900">Phone</span>
                    </div>
                    <input
                        type="number"
                        placeholder="Phone"
                        id="phone"
                        v-model="form.phone"
                        class="input input-bordered input-primary w-96 max-w-xs"
                    />
                </label>
                <div class="label" v-if="errors.phone">
                    <span class="label-text-alt text-red-500">{{ errors.phone }}</span>
                </div>
            </div>

            <div class="w-full flex justify-end items-end p-4">
                <button
                    type="submit"
                    class="btn btn-outline btn-secondary px-6"
                >
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { router, useForm } from "@inertiajs/vue3";
const form = useForm({
    name: null,
    email: null,
    phone: null,
});

defineProps({
    errors: Object,
});

function submit() {
    router.post("/customers", form);
}
</script>
