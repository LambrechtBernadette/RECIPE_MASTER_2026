<?php /** @var array $user */ ?>
<?php $userId = $user['id'] ?? null; ?>

<section class="relative mb-6">
              <img
                class="w-full h-96 object-cover"
                src="./pictures/<?php echo $user['picture']; ?>"
                alt="<?php echo $user['name']; ?>"
              />
              <div
                class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
              >
                <h1 class="text-3xl font-bold mb-2 text-white">
                  <?php echo $user['name']; ?>

                </h1>
                <p class="text-gray-300 mb-4">
                    <?php echo $user['biography']; ?>
                  
                </p>
                <?php if ($userId !== null): ?>
                <a
                  href="?users=show&id=<?php echo $userId; ?>"
                  class="inline-flex items-center px-4 py-2 rounded-md bg-yellow-500 text-gray-900 font-semibold hover:bg-yellow-400 transition"
                >
                  Voir recettes
                </a>
                <?php endif; ?>
              </div>
            </section>