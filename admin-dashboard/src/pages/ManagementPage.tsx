import { useEffect, useState } from 'react';
import { api } from '../services/api';

export function ManagementPage({
  title,
  path,
  createPath
}: {
  title: string;
  path: string;
  createPath?: string;
}) {
  const [data, setData] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  useEffect(() => {
    api<any>(path)
      .then((r) => setData(r.data?.data || r.data || []))
      .catch((e) => setError(e.message))
      .finally(() => setLoading(false));
  }, [path]);

  return (
    <section>
      <header className="page-head">
        <h1>{title}</h1>

        {createPath && (
          <button onClick={() => alert(`Create at ${createPath}`)}>
            Create
          </button>
        )}
      </header>

      {loading && <p>Loading…</p>}

      {error && <p role="alert">{error}</p>}

      {!loading && !error && !data.length && (
        <p>Nothing to display.</p>
      )}

      {!!data.length && (
        <table>
          <tbody>
            {data.map((x, i) => (
              <tr key={x.id || i}>

                <td>
                  {x.user?.name ||
                    x.name ||
                    x.title ||
                    x.phone ||
                    x.status}
                </td>

                <td>
                  {x.category?.name ||
                    x.verification_status ||
                    x.status ||
                    ''}
                </td>

              </tr>
            ))}
          </tbody>
        </table>
      )}
    </section>
  );
}
