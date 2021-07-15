<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Edit
        </div>
        <div class="card-body">
            <div class="col-12" >
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <?php foreach ($products as $product): ?>
                        <label class="form-label">Name</label>
                        <input type="text" value="<?php echo $product->name; ?>" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" value="<?php echo $product->category; ?>" class="form-control" name="category">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" value="<?php echo $product->price; ?>" class="form-control" name="price">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <img width="150px" height="200px" src="<?php  echo $product->image; ?>">
                        <input type="file"  class="form-control" name="image">
                    </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php?page=other-list" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
