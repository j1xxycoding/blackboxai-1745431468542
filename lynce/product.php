<?php
$products = [
    1 => [
        'name' => 'Black Elegance Dress',
        'price' => 299,
        'description' => 'A timeless black dress that embodies sophistication and grace. Perfect for formal events and special occasions. Features a fitted silhouette and premium fabric that ensures both comfort and style.',
        'image' => 'https://images.pexels.com/photos/9558577/pexels-photo-9558577.jpeg',
        'details' => ['Premium Italian fabric', 'Fitted design', 'Hidden back zipper', 'Available in sizes XS-XL']
    ],
    2 => [
        'name' => 'White Collection Suit',
        'price' => 499,
        'description' => 'A stunning white suit that makes a bold statement. Tailored to perfection, this suit combines modern design with classic elegance. Ideal for both professional and formal settings.',
        'image' => 'https://images.pexels.com/photos/9558763/pexels-photo-9558763.jpeg',
        'details' => ['Tailored fit', 'Premium wool blend', 'Silk lining', 'Available in sizes 36-46']
    ],
    3 => [
        'name' => 'Designer Evening Gown',
        'price' => 799,
        'description' => 'An exquisite evening gown that captures the essence of luxury. With its flowing silhouette and intricate details, this gown is designed to make an unforgettable impression at any formal event.',
        'image' => 'https://images.pexels.com/photos/9558658/pexels-photo-9558658.jpeg',
        'details' => ['Handcrafted details', 'Premium silk fabric', 'Built-in corset', 'Available in sizes XS-XL']
    ],
    4 => [
        'name' => 'Classic Black Suit',
        'price' => 599,
        'description' => 'A masterpiece of tailoring, this classic black suit represents the pinnacle of formal wear. Perfect for business meetings, weddings, or any occasion that demands sophistication.',
        'image' => 'https://images.pexels.com/photos/9558776/pexels-photo-9558776.jpeg',
        'details' => ['Italian wool', 'Classic fit', 'Hand-finished details', 'Available in sizes 38-48']
    ],
    5 => [
        'name' => 'Silk Evening Dress',
        'price' => 699,
        'description' => 'A luxurious silk evening dress that combines contemporary design with timeless elegance. The flowing silhouette and premium fabric create a stunning look for any special occasion.',
        'image' => 'https://images.pexels.com/photos/9558588/pexels-photo-9558588.jpeg',
        'details' => ['100% pure silk', 'Draped design', 'Side slit detail', 'Available in sizes XS-XL']
    ],
    6 => [
        'name' => 'Modern White Dress',
        'price' => 399,
        'description' => 'A modern take on the classic white dress. Clean lines and contemporary details make this piece perfect for the fashion-forward individual who appreciates minimalist design.',
        'image' => 'https://images.pexels.com/photos/9558907/pexels-photo-9558907.jpeg',
        'details' => ['Modern cut', 'Premium cotton blend', 'Minimalist design', 'Available in sizes XS-XL']
    ]
];

$pid = isset($_GET['pid']) ? (int)$_GET['pid'] : 0;
$product = isset($products[$pid]) ? $products[$pid] : null;
?>

<?php include 'includes/header.php'; ?>

<main class="container mx-auto px-4 py-12">
    <?php if ($product): ?>
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div class="relative">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" 
                         alt="<?php echo htmlspecialchars($product['name']); ?>" 
                         class="w-full h-[600px] object-cover">
                </div>

                <!-- Product Details -->
                <div class="space-y-8">
                    <div>
                        <h1 class="font-playfair text-3xl mb-2"><?php echo htmlspecialchars($product['name']); ?></h1>
                        <p class="font-inter text-2xl text-gray-800">$<?php echo number_format($product['price'], 2); ?></p>
                    </div>

                    <div>
                        <p class="font-inter text-gray-600 leading-relaxed">
                            <?php echo htmlspecialchars($product['description']); ?>
                        </p>
                    </div>

                    <div>
                        <h2 class="font-montserrat text-lg mb-4">Product Details</h2>
                        <ul class="font-inter space-y-2">
                            <?php foreach ($product['details'] as $detail): ?>
                                <li class="flex items-center">
                                    <span class="text-sm mr-2">&#8226;</span>
                                    <?php echo htmlspecialchars($detail); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="pt-4">
                        <a href="order.php?pid=<?php echo $pid; ?>" 
                           class="inline-block w-full bg-black text-white text-center py-4 font-inter hover:bg-gray-900 transition-colors">
                            Order Now
                        </a>
                    </div>

                    <div class="border-t border-gray-200 pt-8 mt-8">
                        <h3 class="font-montserrat text-sm mb-4">Shipping & Returns</h3>
                        <p class="font-inter text-sm text-gray-600">
                            Free shipping on all orders. Easy returns within 30 days of delivery.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <h1 class="font-playfair text-3xl mb-4">Product Not Found</h1>
            <p class="font-inter text-gray-600 mb-8">Sorry, the product you're looking for is not available.</p>
            <a href="catalog.php" 
               class="inline-block px-8 py-3 bg-black text-white font-inter text-sm hover:bg-gray-900 transition-colors rounded-lg">
                Return to Catalog
            </a>
        </div>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
