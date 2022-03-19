# (In Progress: almost ready) External API Products To Woocommerce

External API Products To Woocommerce is a simple plugin that fetches products from the [FakeStoreAPI](https://fakestoreapi.com/) and automatically creates/updates Woocommerce products using the Woocommerce API.

**Note** :  Needless to say, you will need to have WooCommerce installed, duh 😁 
![WooCommerce](https://woocommerce.com/wp-content/themes/woo/images/logo-woocommerce.svg)

## Installation

```bash
Copy files into your wordpress plugins folder and install composer.
```

## Usage

Activate the plugin and give it a few seconds while it retrieves the fakestoreapi products and inserts them into woocommerce, it takes a bit longer because the images are also downloaded into your media library and applied to each product as a featured image.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Tasks

- [x] Setup plugin using OOP and namespaces
- [x] Create method to add products from external API
- [x] Create method to download product images into the media library and assign it to each product as a featured image
- [] Create method to update products if external API products dont match, such as price or stock
- [] Cleanup, refactor and finalize the plugin

## License
[MIT](https://choosealicense.com/licenses/mit/)