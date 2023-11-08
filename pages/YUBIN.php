<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<button id="copyButton" data-value="111 Value">Copy Value</button>

<script>
function copyButtonValue() {
// Get the button element by its ID
const button = document.getElementById("copyButton");

if (button) {
const valueToCopy = button.getAttribute("data-value");
const tempInput = document.createElement("input");
document.body.appendChild(tempInput);
tempInput.setAttribute("value", valueToCopy);
tempInput.select();
document.execCommand("copy");
document.body.removeChild(tempInput);
alert("Value copied to clipboard!");
}
}

const copyButton = document.getElementById("copyButton");

if (copyButton) {
copyButton.addEventListener("click", copyButtonValue);
}

</script>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="notificationBtn">
Change Profile Photo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Notification</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<img src="../public/ProfileIcon.jpg" alt="" style="height:150px;width:auto;" onclick="done(this.src)" data-dismiss="modal">
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>

<script>

function done(link){
document.getElementById("profilePhoto").setAttribute("src", link);
}

</script>

Image: <img src="" alt="" id="profilePhoto" style="height:150px;width:auto;">

<br><br><br>


<table style="width:5px;text-overflow:ellipsis;">
<tr style="border:1px solid black">
<th>ABC</th>
</tr>

<tr style="border:1px solid black">
<td>aaaadwdwasaaaaadwidnasidnwindiasnd</td>
</tr>
</table>

<table>
<tr>
<td class="wrap-text">This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.This text should wrap within the 30px widthgd iwadu wubdui wabdubd wiuabuidwbu.</td>
</tr>
</table>


<style>
table {
border-collapse: collapse;
}

td {
border: 1px solid #ccc;
padding: 5px;
width: 500px; /* Set the width of the cell to 30px */
}

.wrap-text {
white-space: normal; /* Allow text to wrap within the cell */
min-width: 30px; /* Set a minimum width to ensure text can wrap */
}


</style>


<script>


// Store the interval ID
const intervalId = setInterval(myFunction, 5000);

// To stop the interval after a certain number of repetitions, you can use a counter.
let counter = 0;
const maxRepetitions = 10; // For example, stop after 10 repetitions

function myFunction() {
// Define your function's code here
console.log("Function called at " + new Date().toLocaleString());

counter++;
if (counter >= maxRepetitions) {
clearInterval(intervalId); // Stop the interval after 10 repetitions
}
}


</script>


</html>