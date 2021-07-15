<div class="col-12 col-md-12 mt-2">
    <div class="card">

            <div class="col-12">
                <form class="d-flex" method="post" action="index.php?page=search-Cafe">
                    <input class="form-control me-2"  name="search" placeholder="Search" aria-label="Search">
                    <a href="index.php?page=search-Cafe"><button class="btn btn-outline-success" type="submit" >Tìm kiếm</button></a>
                </form>
                <a type="button" href="index.php?page=add-Product"
                   class="btn btn-secondary">Add</a>
                <table class="table table-bordered table-hover" style="margin-top: 10px">
                    <thead class="thead-dark">
                    <tr style="text-align: center">
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $key => $item): ?>
                        <tr style="text-align: center">
                            <td scope="row"><?php echo $key + 1 ?></td>
                            <td><img width="150px" height="200px" src="<?php echo $item->image;?>"></td>
                            <td scope="row"><?php echo $item->name ?></td>
                            <td scope="row"><?php echo $item->category ?></td>
                            <td scope="row"><?php echo $item->price ?></td>
                            <td>
                                <a type="button" href="index.php?page=oder-Cafe&id=<?php echo $item->id ?>"
                                   class="btn btn-success">Oder</a>
                                    <a type="button" href="index.php?page=edit-Product&id=<?php echo $item->id ?>"
                                       class="btn btn-success">Edit</a>
                                    <a type="button" href="index.php?page=delete-Product&id=<?php echo $item->id ?>"
                                       class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>