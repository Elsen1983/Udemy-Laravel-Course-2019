/**
 * By this function we opening a targeted Modal and when the user confirm that then we delete the category
 */
function handleDelete(elemID, elemName, modalID, modalMessageID, formID, formActionRoute){
    console.log('handleDelete called on ' + elemName);
    console.log(modalID);

    $(`#${modalID}`).modal('show');

    let form = document.querySelector(`#${formID}`);
    form.action = `/${formActionRoute}/` + elemID;

    let modalMessage = document.querySelector(`#${modalMessageID}`);
    modalMessage.innerHTML = ` ${elemName}`;
    console.log(form);

}
