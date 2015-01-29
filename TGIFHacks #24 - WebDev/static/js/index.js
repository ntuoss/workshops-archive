function selectAll()
{
    $('input:checkbox').removeProp('checked').prop('checked', 'checked'); // Check all checkboxes
}

function checkselected()
{
    if (!$('input:checked').length)
    {
        alert("You didn't select any of the materials.");
        return false;
    }
    return true;
}