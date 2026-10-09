document.addEventListener('DOMContentLoaded', () => {
	const readData = (id) => {
		const node = document.getElementById(id);
		if (!node) return [];

		try {
			return JSON.parse(node.textContent || '[]');
		} catch {
			return [];
		}
	};

	const attendanceGrid = document.getElementById('attendance-grid');
	if (attendanceGrid && window.gridjs) {
		const rows = readData('attendance-data');
		const grid = new gridjs.Grid({
			columns: ['Código'],
			data: rows,
			search: true,
			sort: true,
			pagination: { limit: 10 },
			language: {
				search: { placeholder: 'Buscar código...' },
				pagination: { previous: 'Anterior', next: 'Próxima', showing: 'Exibindo', results: () => 'registros' },
				noRecordsFound: 'Nenhum atendimento encontrado',
				error: 'Não foi possível carregar os atendimentos',
			},
		}).render(attendanceGrid);

		const codeFilter = document.getElementById('attendance-code-filter');
		if (codeFilter && window.TomSelect) {
			new TomSelect(codeFilter, {
				create: false,
				onChange: (code) => {
					grid.updateConfig({ data: code ? rows.filter(([rowCode]) => rowCode === code) : rows }).forceRender();
				},
			});
		}

		const chartCanvas = document.getElementById('attendance-chart');
		if (chartCanvas && window.Chart) {
			const chartData = readData('attendance-chart-data');
			new Chart(chartCanvas, {
				type: 'bar',
				data: {
					labels: chartData.labels,
					datasets: [{
						label: 'Atendimentos',
						data: chartData.values,
						backgroundColor: '#4f8a68',
						borderRadius: 4,
						maxBarThickness: 42,
					}],
				},
				options: {
					maintainAspectRatio: false,
					plugins: { legend: { display: false } },
					scales: {
						x: { grid: { display: false } },
						y: { beginAtZero: true, ticks: { precision: 0 } },
					},
				},
			});
		}
	}

	const usersGrid = document.getElementById('users-grid');
	if (usersGrid && window.gridjs) {
		const baseUrl = usersGrid.dataset.baseUrl || '';
		const rows = readData('users-data');
		new gridjs.Grid({
			columns: [
				'ID',
				{
					name: 'Nome',
					formatter: (name, row) => {
						const link = document.createElement('a');
						link.className = 'link link-success font-medium';
						link.href = `${baseUrl}/usuarios/${encodeURIComponent(row.cells[0].data)}`;
						link.textContent = name;
						return gridjs.html(link.outerHTML);
					},
				},
				'E-mail',
			],
			data: rows,
			search: true,
			sort: true,
			pagination: { limit: 10 },
			language: {
				search: { placeholder: 'Buscar usuários...' },
				pagination: { previous: 'Anterior', next: 'Próxima', showing: 'Exibindo', results: () => 'registros' },
				noRecordsFound: 'Nenhum usuário encontrado',
				error: 'Não foi possível carregar os usuários',
			},
		}).render(usersGrid);
	}

});
