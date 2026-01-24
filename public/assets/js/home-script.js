document.addEventListener('DOMContentLoaded', function () {
    // Registration amount calculation
    const radioSingle = document.getElementById('radioSingle');
    const radioGroup = document.getElementById('radioGroup');
    const groupSelectWrapper = document.getElementById('groupSelectWrapper');
    const participantSelect = document.getElementById('participantCount');
    const totalAmountField = document.getElementById('totalAmount');

    const baseAmount = 1000;
    const extraPerPerson = 600;
    const extraPercentage = 1.015;

    function updateAmount() {
        let total = 0;
        if (radioSingle && radioSingle.checked) {
            total = baseAmount;
        } else if (radioGroup && radioGroup.checked) {
            const count = parseInt(participantSelect.value);
            if (!isNaN(count) && count >= 1) {
                const extraPeople = count - 1;
                total = baseAmount + (extraPeople * extraPerPerson);
            } else {
                total = 0;
            }
        }
        total = Math.round(total * extraPercentage);
        if (totalAmountField) {
            totalAmountField.value = total;
        }
    }

    if (radioSingle) {
        radioSingle.addEventListener('change', function () {
            if (this.checked) {
                groupSelectWrapper.classList.add('hidden');
                participantSelect.value = "";
                updateAmount();
            }
        });
    }

    if (radioGroup) {
        radioGroup.addEventListener('change', function () {
            if (this.checked) {
                groupSelectWrapper.classList.remove('hidden');
                updateAmount();
            }
        });
    }

    if (participantSelect) {
        participantSelect.addEventListener('change', updateAmount);
    }
});

setTimeout(() => {
    const alert = document.querySelector('[data-flash]');
    if (alert) {
        alert.classList.add('opacity-0', 'translate-y-[-10px]');
        setTimeout(() => alert.remove(), 500);
    }
}, 4000);
