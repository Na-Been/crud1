<script>
    function validateForm() {
        var form = $("#myForm");
        var name = $("input[name='name']").val();
        var gender = document.forms["myForm"]["gender"].value;
        var phone = document.forms["myForm"]["phone"].value;
        var email = document.forms["myForm"]["email"].value;
        var address = document.forms["myForm"]["address"].value;
        var nation = document.forms["myForm"]["nation"].value;
        var dob = document.forms["myForm"]["dob"].value;
        var ed_bg = document.forms["myForm"]["ed_bg"].value;
        var contact_mode = document.forms["myForm"]["contact_mode"].value;
        if (name == "" || name.length < 3 || name.length > 15) {
            console.log(name)
            alert("Name must be filled out");
            return false;
        }
        if (gender == "" || gender.length < 3 || gender.length > 15) {
            alert("Gender must be filled out");
            return false;
        }
        if (phone == "" || phone.length < 3 || phone.length > 15) {
            alert("Phone must be filled out");
            return false;
        }
        if (email == "" || email.length < 3 || email.length > 15) {
            alert("Email must be filled out");
            return false;
        }
        if (address == "" || address.length < 3 || address.length > 15) {
            alert("Address must be filled out");
            return false;
        }
        if (nation == "" || nation.length < 3 || nation.length > 15) {
            alert("Nationality must be filled out");
            return false;
        }
        if (dob == "" || dob.length < 3 || dob.length > 15) {
            alert("Date Of Birth must be filled out");
            return false;
        }
        if (ed_bg == "" || ed_bg.length < 3 || ed_bg.length > 15) {
            alert("Educational Background must be filled out");
            return false;
        }
        if (contact_mode == "" || contact_mode.length < 3 || contact_mode.length > 15) {
            alert("Contact Mode must be filled out");
            return false;
        }

    }
</script>
