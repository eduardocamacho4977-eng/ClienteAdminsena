<!-- Enlaces a los archivos JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('form[data-table-filter]').forEach((form) => {
        const table = document.querySelector(form.dataset.tableFilter);
        const input = form.querySelector('input[name="search"]');

        if (!table || !input) {
            return;
        }

        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const filterRows = () => {
            const query = input.value.trim().toLocaleLowerCase();

            rows.forEach((row) => {
                row.hidden = !row.textContent.toLocaleLowerCase().includes(query);
            });
        };

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            filterRows();
        });
        input.addEventListener('input', filterRows);
    });
</script>
