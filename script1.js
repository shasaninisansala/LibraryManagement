// Search functionality
document.getElementById("search").addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll("#patientTable tbody tr");

    tableRows.forEach(row => {
        const rowData = row.textContent.toLowerCase();
        if (rowData.includes(searchValue)) {
            row.style.display = ""; // Show the row if it matches
        } else {
            row.style.display = "none"; // Hide the row if it doesn't match
        }
    });
});

// View patient details (dummy functionality, replace with actual implementation)
function viewdocPatient(profileId) {
    // You can implement the logic to redirect or fetch details here
    alert(`View details for Profile ID: ${profileId}`);
    // Example: Redirect to a detailed patient profile page
    // window.location.href = `view_patient_details.php?profileid=${profileId}`;
}
