import {describe,it,expect} from 'vitest';import {MemoryRouter} from 'react-router-dom';import {render,screen} from '@testing-library/react';import {App} from './App';
describe('admin dashboard',()=>{it('redirects unauthenticated users to login',()=>{render(<MemoryRouter initialEntries={['/']}><App/></MemoryRouter>);expect(screen.getByText('Admin Login')).toBeTruthy()})});
