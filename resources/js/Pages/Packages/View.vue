<template>
    <Layout>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h4>
                        <inertia-link :href="$route('package.list')">Packages</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Package Details
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            {{active_package.name}}
                        </div>
                        <div class="card-body">
                            <add-form :package-data="active_package" @packageAdded="handlePackageAdded"></add-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import AddForm from './AddForm.vue'
export default {
    name: "PackageAdd",
    props: ['active_package'],
    components: {
        AddForm,
        Layout,
    },
    methods: {
        handlePackageAdded(payload) {
            payload['id'] = this.active_package.id;
            this.$inertia.post(route("package.update"), payload);
        }
    }
}

</script>
