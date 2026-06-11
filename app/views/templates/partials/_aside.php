
<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
       <?php
        include_once '../app/models/typesModel.php';
        $types = \App\Models\TypesModel\findAll($conn);
       ?>
       <?php include '../app/views/types/_list.php'; ?>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <?php include '../app/views/ingredients/_list.php'; ?>
    </div>
    
</aside>