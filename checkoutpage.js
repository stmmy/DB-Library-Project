//let sortButtonOrder = 'Ascending';


// The sortby function will sort by the selected drop down values
function sortByButton (){

    var sortButtonTitle = document.getElementById("sortButtonTitle").value;
    //Should I have a default value for each sortButton order?
    sortButtonOrder = document.getElementById("sortButtonOrder").value;

    //
    sortBy(sortButtonTitle);

}

function sortBy(column) {
  const table = document.querySelector('table');
  const tbody = table.querySelector('tbody');
  const rows = [...tbody.querySelectorAll('tr')];



//   The sort by method automtically compares row a with row b. 'a' and 'b' are automatically selected during the sort function 
  rows.sort((rowA, rowB) => {

    const aValue = rowA.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText;
    const bValue = rowB.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText;
    console.log(aValue);
    console.log(bValue);
    console.log(column);
    if (column === 'DueDate'){ //sort by DueDate
        const aValueDate = getDateValue(aValue);
        const bValueDate = getDateValue(bValue);

        if (sortButtonOrder === 'Ascending') {
          return aValueDate - bValueDate;
        } else {
          return bValueDate - aValueDate;
        }
      }

    else{ // sort if ID Or Name
        if(sortButtonOrder === 'Ascending') {
            return aValue.localeCompare(bValue);
          } else {
            return bValue.localeCompare(aValue);
          }
    };


    });
    // After sorting the rows, we appened the sorted rows back into the table
    rows.forEach(row => tbody.appendChild(row));

}

function getColumnIndex(column) {
  const headers = document.querySelectorAll('th');
  for (let i = 0; i < headers.length; i++) {
    if (headers[i].innerText === column) {
      return i + 1;
    }
  }
  return -1;
}

function getDateValue(dateString) {
    // Assuming the date format is YYYY-MM-DD
    const [year, month, day] = dateString.split('-'); // parse the data by the '-' ... we caan change depending on our database stores the date
    console.log('The year is ',year, ' . The month ',month, '. The day ', day);
    return new Date(year, month - 1, day); // month - 1 because month is zero-based in JavaScript Date object
  }
