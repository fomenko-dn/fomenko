<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <div class="options">
                            <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">ADD</button>
                            <select name="group" id="group" class="group">
                              <option value="0">Please select</option>
                              <option value="set-act">Set active</option>
                              <option value="set-no-act">Set not active</option>
                              <option value="del-grp">Delete</option>
                            </select>
                            <button type="button" id="ok" name="ok" class="btn btn-primary ok" data-toggle="modal" data-target="#comfirmModal">OK</button>
                        </div>
                        <table class="table user-list" id="table_id">
                            <thead>
                                <tr>
                                <th>
                                    <label class="container">all
                                        <input type="checkbox" name="check_list[]" class=chk-all>
                                    </label></th>
                                <th><span>Name</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Role</span></th>
                                <th>Options</th>
                                </tr>
                            </thead>
                            <tbody class="record">
                                <?php foreach($users as $u): ?>
                            	   <?include 'user.php'?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="options">
                            <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#exampleModal">ADD</button>
                            <select name="group1" id="group1" class="group1">
                              <option value="0">Please select</option>
                              <option value="set-act">Set active</option>
                              <option value="set-no-act">Set not active</option>
                              <option value="del-grp">Delete</option>
                            </select>
                            <button type="button" id="ok1" name="ok1" class="btn btn-primary ok1" data-toggle="modal" data-target="#comfirmModal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>