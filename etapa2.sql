SELECT dept_name AS Departamento, concat(e.first_name," ",e.last_name) AS NomeComleto, datediff(to_date,from_date) AS Dias

FROM employees e

JOIN dept_emp de

ON e.emp_no = de.emp_no

JOIN departments d

ON de.dept_no = d.dept_no

ORDER BY datediff(to_date,from_date) DESC

LIMIT 10

