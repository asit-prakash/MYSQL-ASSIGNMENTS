<?php
    $table1="SELECT * FROM EMPLOYEE_CODE_TABLE";
    $table2="SELECT * FROM EMPLOYEE_DETAILS_TABLE";
    $table3="SELECT * FROM EMPLOYEE_SALARY_TABLE";
    $table4="SELECT * FROM EMPLOYEE_ID_CODE_TABLE";

    $result1=mysqli_query($conn,$table1);
    $row = mysqli_num_rows($result1);
    echo "<table border = '2px solid black'>";
    if($row >0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_CODE"."</th>";
        echo "<th>"."EMPLOYEE_CODE_NAME"."</th>";
        echo "<th>"."EMPLOYEE_CODE_DOMAIN"."</th>";
        while($row = mysqli_fetch_assoc($result1))
        {
            echo "<tr>";
                echo "<td>" . $row["EMPLOYEE_CODE"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_CODE_NAME"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_DOMAIN"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    $result2=mysqli_query($conn,$table2);
    $row = mysqli_num_rows($result2);
    echo "<table border = '2px solid black'>";
    if($row >0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_ID"."</th>";
        echo "<th>"."EMPLOYEE_FIRST_NAME"."</th>";
        echo "<th>"."EMPLOYEE_LAST_NAME"."</th>";
        echo "<th>"."GRADUATION_PERCENTILE"."</th>";
        while($row = mysqli_fetch_assoc($result2))
        {
            echo "<tr>";
                echo "<td>" . $row["EMPLOYEE_ID"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_FIRST_NAME"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_LAST_NAME"] . "</td>";
                echo "<td>" . $row["GRADUATION_PERCENTILE"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    $result3=mysqli_query($conn,$table3);
    $row = mysqli_num_rows($result3);
    echo "<table border = '2px solid black'>";
    if($row >0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_ID"."</th>";
        echo "<th>"."EMPLOYEE_SALARY"."</th>";
        echo "<th>"."EMPLOYEE_CODE"."</th>";
        echo "<th>"."EMPLOYEE_CODE_NAME"."</th>";
        while($row = mysqli_fetch_assoc($result3))
        {
            echo "<tr>";
                echo "<td>" . $row["EMPLOYEE_ID"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_SALARY"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_CODE"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_CODE_NAME"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    $result4=mysqli_query($conn,$table4);
    $row = mysqli_num_rows($result4);
    echo "<table border = '2px solid black'>";
    if($row >0)
    {
        echo "<table border = '2px solid black'>";
        echo "<th>"."EMPLOYEE_ID_CODE"."</th>";
        echo "<th>"."EMPLOYEE_ID"."</th>";
        while($row = mysqli_fetch_assoc($result4))
        {
            echo "<tr>";
                echo "<td>" . $row["EMPLOYEE_ID_CODE"] . "</td>";
                echo "<td>" . $row["EMPLOYEE_ID"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    else
    {
        echo "Empty Table";
    }

    
    
?>