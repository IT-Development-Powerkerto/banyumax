<!--begin::Menu wrapper-->
<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
	data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
	data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
	data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
	data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
	<!--begin::Menu-->
	<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
		id="#kt_header_menu" data-kt-menu="true">
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3 bg-white" href="{{ route ('HumanResource.index') }}">
				<span class="menu-title" style="color: darkblue">Dashboard</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="{{ route ('DailyCheckin') }}">
				<span class="menu-title text-white">Daily Check-in</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="{{ route ('LeaveApplication') }}">
				<span class="menu-title text-white">Leave Application</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="{{ route ('Customize') }}">
				<span class="menu-title text-white">Employees Data</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="#">
				<span class="menu-title text-white">Employees Payroll</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="{{ route ('budgetingreq') }}">
				<span class="menu-title text-white">Budgeting Request</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
		<div class="menu-item menu-lg-down-accordion me-lg-1">
			<a class="menu-link py-3" href="{{ route ('budgeting_realization.index') }}">
				<span class="menu-title text-white">Budgeting Realization</span>
				<span class="menu-arrow d-lg-none"></span>
			</a>
		</div>
	</div> 



		{{-- <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
			class="menu-item menu-lg-down-accordion me-lg-1">
			<span class="menu-link py-3">
				<span class="menu-title">Human Resource</span>
				<span class="menu-arrow d-lg-none"></span>
			</span>
			<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('HumanResource.index') }}" class="menu-title">HR Dashboard</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('DailyCheckin') }}" class="menu-title">Daily Check-in</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('LeaveApplication') }}" class="menu-title">Leave Application</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('Customize') }}" class="menu-title">Employees Data</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="#" class="menu-title">Employees Payroll</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('budgetingreq') }}" class="menu-title">Budgeting Request</a>
					</span>
				</div>
				<div class="menu-item menu-lg-down-accordion">
					<span class="menu-link py-3">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<a href="{{ route ('budgeting_realization.index') }}" class="menu-title">Budgeting Realization</a>
					</span>
				</div>
			</div>
		</div>
		
	</div> --}}
	<!--end::Menu-->
</div>
<!--end::Menu wrapper-->