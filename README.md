# What It Works

1️⃣ **Project Setup & Scaffolding**

- Install Laravel, Livewire, Alpine.js, and Jetstream.
- Scaffold initial models: Product, Variant, Cart, Image.
- Create migrations, factories, and seeders to populate database with sample data.

2️⃣ **Storefront & Product Display**

- Design a storefront page with product listings.
- Format money/currency properly using Money objects.
- Design product pages with detailed info.
- Dynamic product image selector (click to enlarge images via Alpine.js).

3️⃣ **Cart Functionality**

- Add to cart with validation.
- Persist cart and cart items in the database.
- Display success notifications when items are added.
- Show cart in navigation with item count.
- Cart page to review cart contents.
- Delete cart items and merge variant quantities.
- Increment/decrement item quantities.
- Display cart total prices.
- Session cart → user cart migration on login.

4️⃣ **Payment Integration (Stripe)**

- Set up Stripe account and install Laravel Cashier.
- Listen to Stripe webhooks locally using Stripe CLI.
- Enable automatic tax collection in Stripe.
- Create Stripe Checkout session for payments.
- Collect shipping address during checkout if required.
- Handle checkout success object and process webhook.

**Issues Exist**

- Empty cart after successful payment.
- Prepare order confirmation page after payment.
- Send order confirmation email to customer.
- Render tables in Markdown for emails.
- Add button in email to view order details.
- Create order details page per user.
- Send abandoned cart reminder email for inactive carts.
