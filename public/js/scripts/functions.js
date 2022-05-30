/**
 * By this function we opening a targeted Modal and when the user confirm that then we delete the category
 */
function handleDelete(elem, modalName){
    console.log('handleDelete called on ' + elem.name);
    console.log(modalName);

    $(`#${modalName}`).modal('show');

    let form = document.querySelector('#deleteCategoryForm');
    form.action = '/categories/' + elem.id;

    let modalMessage = document.querySelector('#deleteCategoryName');
    modalMessage.innerHTML = ` ${elem.name}`;
    console.log(form);

}
