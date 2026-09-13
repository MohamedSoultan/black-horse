import {ManagementPage} from './ManagementPage';

export const UsersPage = () => 
  <ManagementPage title="Users" path="/admin/users"/>;

export const ProvidersPage = () => 
  <ManagementPage title="Providers" path="/admin/providers"/>;

export const ServicesPage = () => 
  <ManagementPage title="Services" path="/services" createPath="/admin/services"/>;

export const PortfolioPage = () => 
  <ManagementPage title="Portfolio" path="/portfolio" createPath="/admin/portfolio"/>;

export const RequestsPage = () => 
  <ManagementPage title="Requests" path="/admin/requests"/>;

export const NotificationsPage = () => 
  <ManagementPage title="Notifications" path="/notifications"/>;

export const RolesPage = () => 
  <ManagementPage title="Roles & Permissions" path="/admin/roles"/>;
