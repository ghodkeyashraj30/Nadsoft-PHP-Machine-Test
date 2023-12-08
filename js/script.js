

$(document).ready(function () {

    function openAddMemberForm() {
        $('#addMemberForm').show();
    }
    function fetchParentMembers() {
        $.ajax({
            type: 'GET',
            url: 'fetch_parent_members.php',
            success: function (response) {
                var parentMembers = JSON.parse(response);

                populateParentDropdown(parentMembers);
                console.log('Dropdown HTML:', $('#parentDropdown').html());
            },
            error: function (error) {
                console.error('Error fetching parent members:', error);
            }
        });
    }

    function populateParentDropdown(parentMembers) {

        var parentDropdown = $('#parentDropdown');
        parentDropdown.empty();

        parentDropdown.append($('<option>', {
            value: '',
            text: 'No Parent'
        }));

        
        parentMembers.forEach(function (member) {
            parentDropdown.append($('<option>', {
                value: member.Id,
                text: member.Name
            }));
        });
    }


    $('#addMemberBtn').on('click', function () {
        openAddMemberForm();
    });


    $('#saveMemberBtn').on('click', function () {
    
        var parentDropdownValue = $('#parentDropdown').val();
        var memberNameValue = $('#memberName').val();

        
        if (!memberNameValue) {
            alert('Please enter a member name.');
            return;
        }


        $.ajax({
            type: 'POST',
            url: 'save_member.php',
            data: {
                parent: parentDropdownValue,
                name: memberNameValue
            },
            success: function (response) {
                if (window.location.hostname === 'localhost') {
                    console.log(response);
                }

            
                $('#addMemberForm').hide();

                $('#parentDropdown').val('');
                $('#memberName').val('');
            },
            error: function (error) {
                console.error('Error adding member:', error);
            }
        });
    });

    fetchParentMembers();
});
