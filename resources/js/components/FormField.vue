<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                class="w-full form-control form-input form-input-bordered"
                :id="field.attribute"
                :dusk="field.attribute"
                v-model="value"
                v-bind="extraAttributes"
            />
        </template>
    </default-field>
</template>

<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'
    import Inputmask from 'inputmask'
    export default {
        mixins: [HandlesValidationErrors, FormField],
        mounted() {
            Inputmask({
                alias: 'numeric',
                allowMinus: false,
                allowPlus: false,
                autoGroup: true,
                groupSeparator: ',',
                max: this.field.max,
                min: this.field.min,
                rightAlign: false,
                step: this.field.step,
            }).mask(document.getElementById(this.field.attribute))
        },
        computed: {
            defaultAttributes() {
                return {
                    type: 'text',
                    min: this.field.min,
                    max: this.field.max,
                    step: this.field.step,
                    pattern: this.field.pattern,
                    placeholder: this.field.placeholder || this.field.name,
                    class: this.errorClasses,
                }
            },
            extraAttributes() {
                const attrs = this.field.extraAttributes
                return {
                    ...this.defaultAttributes,
                    ...attrs,
                }
            },
        },
    }
</script>
