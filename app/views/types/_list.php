 <?php /** @var array $types */ ?>
 
 <h2 class="font-bold text-lg mb-4">Catégories</h2>

        <ul class="list-reset text-gray-100">
            <?php foreach ($types as $type): ?>
                <li>
                    <a
                        class="hover:text-white hover:bg-yellow-600 px-2 block"
                        href="?recipes=category&id=<?php echo $type['category_id']; ?>">
                        <?php echo $type['category_name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            
                
        </ul>