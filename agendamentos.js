const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const tableBody = document.getElementById('agendamentosTableBody');
const emptyState = document.getElementById('emptyState');

const openCreateModalBtn = document.getElementById('openCreateModal');
const createModalOverlay = document.getElementById('createModalOverlay');
const closeCreateModalBtn = document.getElementById('closeCreateModal');

const editModalOverlay = document.getElementById('editModalOverlay');
const closeEditModalBtn = document.getElementById('closeEditModal');

const editForm = document.getElementById('editForm');
const createForm = document.getElementById('createForm');

let currentEditRow = null;
let nextId = getNextId();

function getNextId() {
    const rows = document.querySelectorAll('.agendamento-row');
    let maxId = 0;

    rows.forEach(row => {
        const id = Number(row.dataset.id || 0);
        if (id > maxId) maxId = id;
    });

    return maxId + 1;
}

function normalize(text) {
    return (text || '')
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '');
}

function getBadgeHTML(status) {
    const badges = {
        'Confirmado': '<span class="badge badge-confirmado">Confirmado</span>',
        'Pendente': '<span class="badge badge-pendente">Pendente</span>',
        'Concluído': '<span class="badge badge-concluido">Concluído</span>',
        'Cancelado': '<span class="badge badge-cancelado">Cancelado</span>'
    };

    return badges[status] || badges['Pendente'];
}

function applyFilters() {
    const query = normalize(searchInput.value);
    const filter = statusFilter.value;
    const rows = document.querySelectorAll('.agendamento-row');

    let visibleCount = 0;

    rows.forEach(row => {
        const text = normalize(
            row.dataset.cliente + ' ' +
            row.dataset.telefone + ' ' +
            row.dataset.veiculo + ' ' +
            row.dataset.servico + ' ' +
            row.dataset.data + ' ' +
            row.dataset.hora + ' ' +
            row.dataset.status
        );

        const matchesSearch = !query || text.includes(query);
        const matchesFilter = filter === 'Todos' || row.dataset.status === filter;
        const show = matchesSearch && matchesFilter;

        row.style.display = show ? '' : 'none';

        if (show) visibleCount++;
    });

    emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
}

function openModal(modal) {
    modal.classList.add('show');
}

function closeModal(modal) {
    modal.classList.remove('show');
}

function fillEditModal(row) {
    currentEditRow = row;

    document.getElementById('edit_id').value = row.dataset.id;
    document.getElementById('edit_cliente').value = row.dataset.cliente;
    document.getElementById('edit_telefone').value = row.dataset.telefone;
    document.getElementById('edit_veiculo').value = row.dataset.veiculo;
    document.getElementById('edit_servico').value = row.dataset.servico;
    document.getElementById('edit_data').value = row.dataset.data;
    document.getElementById('edit_hora').value = row.dataset.hora;
    document.getElementById('edit_observacoes').value = row.dataset.observacoes;
}

function updateRowFromEditForm() {
    if (!currentEditRow) return;

    const cliente = document.getElementById('edit_cliente').value.trim();
    const telefone = document.getElementById('edit_telefone').value.trim();
    const veiculo = document.getElementById('edit_veiculo').value.trim();
    const servico = document.getElementById('edit_servico').value.trim();
    const data = document.getElementById('edit_data').value.trim();
    const hora = document.getElementById('edit_hora').value.trim();
    const observacoes = document.getElementById('edit_observacoes').value.trim();

    currentEditRow.dataset.cliente = cliente;
    currentEditRow.dataset.telefone = telefone;
    currentEditRow.dataset.veiculo = veiculo;
    currentEditRow.dataset.servico = servico;
    currentEditRow.dataset.data = data;
    currentEditRow.dataset.hora = hora;
    currentEditRow.dataset.observacoes = observacoes;

    currentEditRow.children[0].innerHTML = '<strong>' + cliente + '</strong><br><span>' + telefone + '</span>';
    currentEditRow.children[1].textContent = veiculo;
    currentEditRow.children[2].textContent = servico;
    currentEditRow.children[3].innerHTML = data + '<br><span>' + hora + '</span>';
}

function createNewRow(data) {
    const tr = document.createElement('tr');

    tr.className = 'agendamento-row';
    tr.dataset.id = data.id;
    tr.dataset.cliente = data.cliente;
    tr.dataset.telefone = data.telefone;
    tr.dataset.veiculo = data.veiculo;
    tr.dataset.servico = data.servico;
    tr.dataset.data = data.data;
    tr.dataset.hora = data.hora;
    tr.dataset.status = data.status;
    tr.dataset.observacoes = data.observacoes;

    tr.innerHTML = `
        <td><strong>${data.cliente}</strong><br><span>${data.telefone}</span></td>
        <td>${data.veiculo}</td>
        <td>${data.servico}</td>
        <td>${data.data}<br><span>${data.hora}</span></td>
        <td class="status-cell">${getBadgeHTML(data.status)}</td>
        <td>
            <div class="actions">
                <button class="icon-btn icon-success btn-confirm" type="button" title="Confirmar">✔</button>
                <button class="icon-btn icon-danger btn-cancel" type="button" title="Cancelar">✖</button>
                <button class="icon-btn icon-dark btn-edit" type="button" title="Editar">✎</button>
                <button class="icon-btn icon-danger btn-delete" type="button" title="Excluir">🗑</button>
            </div>
        </td>
    `;

    attachRowEvents(tr);
    tableBody.prepend(tr);
}

function attachRowEvents(row) {
    const editBtn = row.querySelector('.btn-edit');
    const confirmBtn = row.querySelector('.btn-confirm');
    const cancelBtn = row.querySelector('.btn-cancel');
    const deleteBtn = row.querySelector('.btn-delete');

    editBtn.addEventListener('click', function () {
        fillEditModal(row);
        openModal(editModalOverlay);
    });

    confirmBtn.addEventListener('click', function () {
        row.dataset.status = 'Confirmado';
        row.querySelector('.status-cell').innerHTML = getBadgeHTML('Confirmado');
        applyFilters();
    });

    cancelBtn.addEventListener('click', function () {
        row.dataset.status = 'Cancelado';
        row.querySelector('.status-cell').innerHTML = getBadgeHTML('Cancelado');
        applyFilters();
    });

    deleteBtn.addEventListener('click', function () {
        row.remove();
        applyFilters();
    });
}

document.querySelectorAll('.agendamento-row').forEach(attachRowEvents);

searchInput.addEventListener('input', applyFilters);
statusFilter.addEventListener('change', applyFilters);

openCreateModalBtn.addEventListener('click', function () {
    openModal(createModalOverlay);
});

closeCreateModalBtn.addEventListener('click', function () {
    closeModal(createModalOverlay);
});

closeEditModalBtn.addEventListener('click', function () {
    closeModal(editModalOverlay);
});

createModalOverlay.addEventListener('click', function (event) {
    if (event.target === createModalOverlay) {
        closeModal(createModalOverlay);
    }
});

editModalOverlay.addEventListener('click', function (event) {
    if (event.target === editModalOverlay) {
        closeModal(editModalOverlay);
    }
});

createForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const newData = {
        id: nextId++,
        cliente: document.getElementById('new_cliente').value.trim(),
        telefone: document.getElementById('new_telefone').value.trim(),
        veiculo: document.getElementById('new_veiculo').value.trim(),
        servico: document.getElementById('new_servico').value.trim(),
        data: document.getElementById('new_data').value.trim(),
        hora: document.getElementById('new_hora').value.trim(),
        observacoes: document.getElementById('new_observacoes').value.trim(),
        status: 'Pendente'
    };

    createNewRow(newData);
    createForm.reset();
    closeModal(createModalOverlay);
    applyFilters();
});

editForm.addEventListener('submit', function (event) {
    event.preventDefault();
    updateRowFromEditForm();
    closeModal(editModalOverlay);
    applyFilters();
});

applyFilters();