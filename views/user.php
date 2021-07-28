<tr id="record<?=$u['id']?>">  	
    <td>
        <label class="container">
            <input type="checkbox" name="check_list[]" class="check" data-id="<?=$u['id']?>" value="<?=$u['id']?>">
        </label>
    </td>   
    <td>
        <a class="first_name" id="first<?=$u['id']?>"><?=$u['first_name']?></a>
        <a class="last_name" id="last<?=$u['id']?>"><?=$u['last_name']?></a>
    </td>
    <td class="text-center">
        <span class="label label-default status" data-id="stat<?=$u['id']?>" value="<?=$u['status']?>">
            <?if($u['status']=='0'){?>
                <i class="fa fa-circle no-act" aria-hidden="true" id="act<?=$u['id']?>"></i>
            <?}else{?>
                <i class="fa fa-circle act" aria-hidden="true" id="act<?=$u['id']?>"></i>
            <?};?>
        </span>
    </td>
    <td>
        <span class="user-subhead role" id="rol<?=$u['id']?>"><?=$u['role']?></span>
    </td>
    <td style="width: 20%;">
        <button data-id="<?=$u['id']?>" class="table-link text-info edit" data-toggle="modal" data-target="#exampleModal">
            <span class="fa-stack">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
            </span>
        </button>
        <button data-id="<?=$u['id']?>" class="table-link danger trash" data-toggle="modal" data-target="#comfirmDeleteModal">
            <span class="fa-stack">
                <i class="fa fa-square fa-stack-2x"></i>
                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
            </span>
        </button>
    </td>
</tr>