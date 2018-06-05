<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        PUSHA T
                        <router-link to="/products"><a>URL to Products</a></router-link>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import router from '../routes.js';

export default {
    router,
    data () {
        return {
            message: 'This is the home component!'
        };
    }
};
</script>