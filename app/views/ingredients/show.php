<?php /** @var ?array $ingredient */ ?>

<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h1 class="text-3xl font-bold mb-4"><?php echo $ingredient['name'] ?? 'Ingredient introuvable'; ?></h1>

    <?php if ($ingredient): ?>
        <dl class="space-y-3 text-gray-700">
            <div>
                <dt class="font-semibold">Nom</dt>
                <dd><?php echo $ingredient['name'] ?? ''; ?></dd>
            </div>
            <div>
                <dt class="font-semibold">Unite</dt>
                <dd><?php echo $ingredient['unit'] ?? ''; ?></dd>
            </div>
            <div>
                <dt class="font-semibold">Ajoute le</dt>
                <dd><?php echo $ingredient['created_at'] ?? ''; ?></dd>
            </div>
        </dl>
    <?php else: ?>
        <p class="text-gray-700">Aucun ingredient ne correspond a cet identifiant.</p>
    <?php endif; ?>
</section>