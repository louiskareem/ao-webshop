<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">#</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price (&euro;)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div
                                    v-for="product in products"
                                    v-bind="product"
                                >
                                    {{ product.name }}
                                    {{ product.description }}
                                    {{ product.price }}
                                </div>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
  function Product({ name, description, price }) {
    this.name = name;
    this.description
    this.price
  }

    export default {
        data() {
          return {
            products: []
          }
        },    
        mounted() {
            console.log('Co mounted.')
        },
        methods: {
            read() {
                window.axios.get('/api').then(({ data }) => {
                    console.log(data);
                    data.forEach(product => {
                        this.products.push(new Product(product));
                    });
                });
            }
        },
        created() {
          this.read();
        }
    }
</script>
