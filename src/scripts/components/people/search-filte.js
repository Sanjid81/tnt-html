const searchInput = document.getElementById('searchName');
const filterSelect = document.getElementById('filterPractice');
const teamCards = document.querySelectorAll('#teamList .team-card');

searchInput.addEventListener('input', filterTeam);
filterSelect.addEventListener('change', filterTeam);

function filterTeam() {
    const nameVal = searchInput.value.toLowerCase();
    const areaVal = filterSelect.value.toLowerCase();

    teamCards.forEach(card => {
        const cardName = card.dataset.name;
        const cardArea = card.dataset.area;

        if (
            cardName.includes(nameVal) &&
            (areaVal === '' || cardArea === areaVal)
        ) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
